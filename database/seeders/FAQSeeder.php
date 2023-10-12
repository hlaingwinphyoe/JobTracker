<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faqs = FAQ::factory()->count(10)->create();

        $faq1 = FAQ::create([
            'title' => 'How to register as employer?',
            'desc' => 'Quis eligendi tenetur culpa quae dolorum velit laudantium qui ratione autem ad ut nisi voluptas.Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, perferendis dolorem? Pariatur quo est cupiditate libero impedit dolore? Iste saepe sunt nemo ab laudantium non soluta, repudiandae accusantium sequi fugiat.',
            'faq_type_id' => 1,
        ]);

        $faq2 = FAQ::create([
            'title' => 'How to register as employee?',
            'desc' => 'Doloribus deleniti possimus nam nam suscipit ad aut dolor quae ullam reiciendis dolor ab dolor quo sit deserunt voluptas rerum nisi impedit excepturi ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, perferendis dolorem? Pariatur quo est cupiditate libero impedit dolore? Iste saepe sunt nemo ab laudantium non soluta, repudiandae accusantium sequi fugiat.',
            'faq_type_id' => 1,
        ]);

        $faq3 = FAQ::create([
            'title' => 'How to apply job?',
            'desc' => 'Earum commodi culpa ipsum dolores et vitae earum dolorem rem officia delectus quas nulla natus quo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, perferendis dolorem? Pariatur quo est cupiditate libero impedit dolore? Iste saepe sunt nemo ab laudantium non soluta, repudiandae accusantium sequi fugiat.',
            'faq_type_id' => 1,
        ]);

        $faq2 = FAQ::create([
            'title' => 'How to search job?',
            'desc' => 'Harum fugit numquam nam incidunt provident dolore aspernatur illo dolorem ipsum sint alias magni sint ratione odit sunt et assumenda est sit cum ducimus mollitia consectetur.Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, perferendis dolorem? Pariatur quo est cupiditate libero impedit dolore? Iste saepe sunt nemo ab laudantium non soluta, repudiandae accusantium sequi fugiat.',
            'faq_type_id' => 1,
        ]);
    }
}
