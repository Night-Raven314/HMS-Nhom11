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

namespace Google\Service\BigQueryReservation;

class Autoscale extends \Google\Model
{
  /**
   * @var string
   */
  public $currentSlots;
  /**
   * @var string
   */
  public $maxSlots;

  /**
   * @param string
   */
  public function setCurrentSlots($currentSlots)
  {
    $this->currentSlots = $currentSlots;
  }
  /**
   * @return string
   */
  public function getCurrentSlots()
  {
    return $this->currentSlots;
  }
  /**
   * @param string
   */
  public function setMaxSlots($maxSlots)
  {
    $this->maxSlots = $maxSlots;
  }
  /**
   * @return string
   */
  public function getMaxSlots()
  {
    return $this->maxSlots;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Autoscale::class, 'Google_Service_BigQueryReservation_Autoscale');
