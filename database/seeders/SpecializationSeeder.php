<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->truncate();

        $specializations = [
            [
                '1' => 'برمجة تطبيقات هواتف ذكية',
            ],
            [
                '1' => 'برمجة مواقع الويب',
            ],
            [
                '1' => 'برمجة قواعد البيانات',
            ],
            [
                '2' => 'الهندسة الزراعية',
            ],
            [
                '2' => 'الهندسة الصناعية',
            ],
            [
                '2' => 'الهندسة البيئية',
            ],
            [
                '2' => 'الهندسة المدنية',
            ],
            [
                '2' => 'الهندسة المعمارية',
            ],
            [
                '2' => 'هندسة الميكانيكية',
            ],
            [
                '2' => 'الهندسة الكيميائية',
            ],
            [
                '2' => 'هندسة الحاسوب',
            ],
            [
                '2' => 'التقنيات الحيوية',
            ],
            [
                '2' => 'الرياضيات',
            ],
            [
                '2' => 'الكيمياء',
            ],
            [
                '2' => 'الفيزياء التطبيقية وعلم الفلك',
            ],
            [
                '3' => 'مدير تسويق',
            ],
            [
                '3' => 'أخصائي تسويق',
            ],
            [
                '3' => 'مدير مبيعات',
            ],
            [
                '4' => 'كاتب محتوى',
            ],
            [
                '4' => 'الترجمة التقنية',
            ],
            [
                '4' => 'الترجمة الفورية',
            ],
            [
                '4' => 'ترجمة المحاكم والمؤتمرات',
            ],

            [
                '4' => 'الترجمة الأدبية',
            ],

            [
                 '4' => 'الترجمة الأفلام والوثائقيات',
            ],
            [
                 '4' => 'الترجمة القانونية',
            ],
            [
                '5'  => 'الرد على العملاء',
            ],
            [
                '5'  => 'التعامل مع المشاكل التقنية',
            ],
            [
                '6'  => 'المحاسبة العامة',
            ],
            [
                '6'  => 'محاسبة الضرائب',
            ],
            [
                '6'  => 'المحاسبة المالية',
            ],
            [
                '6'  => 'المحاسبة الإدارية',
            ],
            [
                '6'  => 'محاسبة التكاليف',
            ],
            [
                '6'  => 'التدقيق المحاسبي',
            ],
            [
                '6'  => 'المحاسبة الجنائية',
            ],
            [
                '6'  => 'نظام المعلومات المحاسبية',
            ],
            [
                '6'  => 'المحاسبة الحكومية',
            ],
            [
                '7'  => 'التصميم التطبيقي',
            ],
            [
                '7'  => 'الفنون الجميلة',
            ],
            [
                '7'  => 'تصميم صفحات الويب',
            ],
            [
                '7'  => 'تصميم الشعارات',
            ],
            [
                '7'  => 'تصميم الإعلانات',
            ],
            [
                '8'  => 'الدعم الفني في مجال الحاسب',
            ],
            [
                '8'  => 'إدارة الشبكات وقواعد البيانات',
            ],
            [
                '8'  => 'تحليل الإنطمة',
            ],
            [
                '8'  => 'لغات البرمجة وتطوير البرمجيات',
            ],
            [
                '8'  => 'إدارة وتصميم أنطمة الإتصالات والحاسب',
            ],
            [
                '8'  => 'المونتاج',
            ],
            [
                '8'  => 'الرسوم المتحركة',
            ],




        ];

        foreach ($specializations as $specialization){
            foreach ($specialization as $key => $value) {
                DB::table('specializations')->insert([
                    'field_id' => $key,
                    'specialization_name' => $value,
                ]);
            }
        }

    }
}