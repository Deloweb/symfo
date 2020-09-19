<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\SchoolYear;
use App\Entity\Student;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $tag = new Tag();
            $tag->setName($faker->words($nb = 2, $asText = true)  );
            $manager->persist($tag);
        }

        $manager->flush();

        for ($i = 1; $i <= 10; $i++) {
            $project = new Project();
            $project->setName($faker->words($nb = 4, $asText = true)  );
            $project->setDescription($faker->text($maxNbChars = 200));
            $manager->persist($project);
        }

        $manager->flush();
        
        for ($i = 1; $i <= 6; $i++) {
            $schoolYear = new SchoolYear();
            $schoolYear->setName($faker->words($nb = 3, $asText = true)  );
            $manager->persist($schoolYear);
        }

        $manager->flush();

        for ($i = 1; $i <= 20; $i++) {
            $student = new Student();
            $student->setFirstname($faker->firstNameMale);
            $student->setLastname($faker->lastName);
            $student->setEmail($faker->email);
            $student->setBirthYear($faker->year($max = 'now') );
            $student->addProject($project);
            $student->addTag($tag);
            $manager->persist($student);
        }
        
        $manager->flush();
    }
}
