-- Insert dummy complaint data with photos for testing
INSERT INTO complaint (date_complaint, nik, contents_of_the_report, photo, status, society_id, created_at, updated_at) VALUES
('2024-01-15', '1234567890123456', 'Jalan rusak di depan rumah saya, mohon segera diperbaiki', 'complaint1.png', '0', 1, NOW(), NOW()),
('2024-01-16', '1234567890123457', 'Lampu jalan mati sudah seminggu, berbahaya untuk pengendara malam', 'complaint2.png', 'process', 2, NOW(), NOW()),
('2024-01-17', '1234567890123458', 'Sampah menumpuk di pinggir jalan, bau tidak sedap', NULL, 'finished', 3, NOW(), NOW()),
('2024-01-18', '1234567890123459', 'Pohon tumbang menghalangi jalan utama', 'complaint1.png', '0', 1, NOW(), NOW()),
('2024-01-19', '1234567890123460', 'Kebocoran pipa air bersih di kompleks perumahan', 'complaint2.png', 'process', 2, NOW(), NOW())
ON DUPLICATE KEY UPDATE
    photo = VALUES(photo),
    status = VALUES(status),
    updated_at = NOW();