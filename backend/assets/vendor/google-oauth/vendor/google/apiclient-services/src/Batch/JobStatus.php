<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Batch;

class JobStatus extends \Google\Collection
{
  protected $collection_key = 'statusEvents';
  /**
   * @var string
   */
  public $runDuration;
  /**
   * @var string
   */
  public $state;
  protected $statusEventsType = StatusEvent::class;
  protected $statusEventsDataType = 'array';
  protected $taskGroupsType = TaskGroupStatus::class;
  protected $taskGroupsDataType = 'map';

  /**
   * @param string
   */
  public function setRunDuration($runDuration)
  {
    $this->runDuration = $runDuration;
  }
  /**
   * @return string
   */
  public function getRunDuration()
  {
    return $this->runDuration;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param StatusEvent[]
   */
  public function setStatusEvents($statusEvents)
  {
    $this->statusEvents = $statusEvents;
  }
  /**
   * @return StatusEvent[]
   */
  public function getStatusEvents()
  {
    return $this->statusEvents;
  }
  /**
   * @param TaskGroupStatus[]
   */
  public function setTaskGroups($taskGroups)
  {
    $this->taskGroups = $taskGroups;
  }
  /**
   * @return TaskGroupStatus[]
   */
  public function getTaskGroups()
  {
    return $this->taskGroups;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobStatus::class, 'Google_Service_Batch_JobStatus');
