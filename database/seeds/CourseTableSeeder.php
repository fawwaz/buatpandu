<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::truncate();
        $this->command->info('Table Course Truncated');

        // $table->increments('id');
        //     $table->string('course_name');
        //     $table->mediumText('description');
        //     $table->integer('parent_id')->unsigned()->nullable();
        //     $table->foreign('parent_id')->references('id')->on('courses')->onDelete('set null');

        $matematika1 = Course::create(array(
            'course_name' => 'Matematika 1',
            'parent_id' => null,
            'description' => 'Description placeholder for Matermatika 1'
        ));

        $inggris1 = Course::create(array(
            'course_name' => 'Inggris 1',
            'parent_id' => null,
            'description' => 'Description placeholder for Inggris 1'
        ));

        $kimia1 = Course::create(array(
            'course_name' => 'Kimia 1',
            'parent_id' => null,
            'description' => 'Description placeholder for Kimia 1'
        ));

        $data = [
            [
                "course_name" => 'Matematika 2',
                "description" => 'decription placeholder for Matematika 2',
            ],[
                "course_name" => 'Matematika 3',
                "description" => 'decription placeholder for Matematika 3',
            ],[
                "course_name" => 'Matematika Lanjut',
                "description" => 'decription placeholder for Matematika lanjut',
            ]
        ];

        $prev_course = $matematika1;
        foreach ($data as $d ) {
            $curr_course = new Course;
            $curr_course->course_name = $d['course_name'];
            $curr_course->parent_id = $prev_course->id;
            $curr_course->description = $d['description'];
            $curr_course->save();
            $prev_course = $curr_course;
        }

        $data = [
            [
                "course_name" => 'Bahasa Inggris 2',
                "description" => 'decription placeholder for Bahasa Inggris 2',
            ],[
                "course_name" => 'Bahasa Inggris 3',
                "description" => 'decription placeholder for Bahasa Inggris 3',
            ],[
                "course_name" => 'Bahasa Inggris Lanjut',
                "description" => 'decription placeholder for Bahasa Inggris lanjut',
            ]
        ];

        $prev_course = $inggris1;
        foreach ($data as $d ) {
            $curr_course = new Course;
            $curr_course->course_name = $d['course_name'];
            $curr_course->parent_id = $prev_course->id;
            $curr_course->description = $d['description'];
            $curr_course->save();
            $prev_course = $curr_course;
        }

        $data = [
            [
                "course_name" => 'Kimia 2',
                "description" => 'decription placeholder for Kimia 2',
            ],[
                "course_name" => 'Kimia 3',
                "description" => 'decription placeholder for Kimia 3',
            ],[
                "course_name" => 'Kimia Lanjut',
                "description" => 'decription placeholder for Kimia lanjut',
            ]
        ];

        $prev_course = $kimia1;
        foreach ($data as $d ) {
            $curr_course = new Course;
            $curr_course->course_name = $d['course_name'];
            $curr_course->parent_id = $prev_course->id;
            $curr_course->description = $d['description'];
            $curr_course->save();
            $prev_course = $curr_course;
        }
        
    }
}
