<?php

declare(strict_types=1);

namespace Domain\Objective\Actions\Objective;

use Domain\Objective\Mail\ObjectiveCreated;
use Domain\Objective\Models\Objective;
use Illuminate\Contracts\Mail\Mailer;

class SendObjectiveMailAction
{
    private Mailer $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function execute(Objective $objective)
    {
        $this->mailer
            ->to('job.verplanke@gmail.com')
            ->send(new ObjectiveCreated($objective));
    }
}
