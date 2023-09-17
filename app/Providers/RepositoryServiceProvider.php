<?php

namespace App\Providers;

use App\Repository\QuizzRepository;
use App\Repository\QuestionRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\QuizzRepositoryInterface;
use App\Repository\QuestionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository');
        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository');
        $this->app->bind(
            'App\Repository\StudentPromotionRepositoryInterface',
            'App\Repository\StudentPromotionRepository',

        ); 
        $this->app->bind(
            'App\Repository\StudentGraduatedRepositoryInterface',
            'App\Repository\StudentGraduatedRepository',
        );
        $this->app->bind(
            'App\Repository\PaymentRepositoryInterface',
            'App\Repository\PaymentRepository',
        );
        $this->app->bind(
            'App\Repository\AttendenceRepositoryInterface',
            'App\Repository\AttendenceRepository',
        );
        $this->app->bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository',
        );
        $this->app->bind(
            'App\Repository\ExamRepositoryInterface',
            'App\Repository\ExamRepository',
        );

        // agin way
        $this->app->bind(QuizzRepositoryInterface::class, QuizzRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class , QuestionRepository::class);
        

    }
 

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
