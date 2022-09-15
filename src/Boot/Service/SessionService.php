<?php 

namespace Boot\Service;

class SessionService extends BootService
{

    public function boot(): void
    {
        session_start();
    }

}