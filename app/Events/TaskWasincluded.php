<?php

namespace CodeProject\Events;

use CodeProject\Entities\ProjectTask;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class TaskWasIncluded extends Event implements ShouldBroadcast
{
    use SerializesModels; //Pega todas as variaveis publicas dentro da class e serializa

    public $task;

    public function __construct(ProjectTask $projectTask)
    {
        $this->task = $projectTask;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user.'.\Authorizer::getResourceOwnerId()];
    }
}
