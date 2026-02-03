<?php

namespace Tests\Feature;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComplaintTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_complaints()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/user/complaint');

        $response->assertStatus(200);
    }

    public function test_admin_can_filter_complaints()
    {
        $admin = User::factory()->create(['level_id' => 1]);
        $this->actingAs($admin);

        Complaint::factory()->create(['status' => 'process']);

        $response = $this->get('/admin/complaints?status=process');

        $response->assertStatus(200);
        $response->assertSee('process');
    }

    public function test_admin_can_export_complaints()
    {
        $admin = User::factory()->create(['level_id' => 1]);
        $this->actingAs($admin);

        Complaint::factory()->create();

        $response = $this->get('/admin/complaints-export');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv');
    }
}