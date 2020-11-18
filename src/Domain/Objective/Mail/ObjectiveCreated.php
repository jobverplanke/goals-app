<?php

declare(strict_types=1);

namespace Domain\Objective\Mail;

use Domain\Objective\Models\Objective;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ObjectiveCreated extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    private Objective $objective;

    /**
     * Create a new message instance.
     *
     * @param \Domain\Objective\Models\Objective $objective
     */
    public function __construct(Objective $objective)
    {
        $this->objective = $objective;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new-objective')
            ->subject($this->getSubject())
            ->with([
                'objectiveName' => $this->objective->getAttribute('name')
            ]);
    }

    private function getSubject(): string
    {
        return 'A new objective has been created';
    }
}
