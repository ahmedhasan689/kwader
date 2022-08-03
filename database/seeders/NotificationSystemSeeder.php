<?php

namespace Database\Seeders;

use App\Models\NotificationSystem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notification_systems')->truncate();

        $employer_notifications = [
            'الموافقة على وظيفة قيد المراجعة',
            'استقبال طلبات جديدة للتوظيف',
            'ملخص أسبوعي عن عملية التوظيف الجارية',
            'توقيع الكادر على العقد',
            'موافقة الموقع على عقد قيد المراجعة',
            'إتمام المعاملات المالية',
            'مصادقة الموقع على عقد العمل',
            'جديد الخصومات والعروض الخاصة بالموقع',
        ];

        foreach ( $employer_notifications as $notification ) {
            NotificationSystem::create([
                'notification_name' => $notification,
                'user_type' => 'Employer',
            ]);
        }
    }
}
