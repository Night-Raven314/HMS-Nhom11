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

namespace Google\Service\Forms;

class DateQuestion extends \Google\Model
{
  /**
   * @var bool
   */
  public $includeTime;
  /**
   * @var bool
   */
  public $includeYear;

  /**
   * @param bool
   */
  public function setIncludeTime($includeTime)
  {
    $this->includeTime = $includeTime;
  }
  /**
   * @return bool
   */
  public function getIncludeTime()
  {
    return $this->includeTime;
  }
  /**
   * @param bool
   */
  public function setIncludeYear($includeYear)
  {
    $this->includeYear = $includeYear;
  }
  /**
   * @return bool
   */
  public function getIncludeYear()
  {
    return $this->includeYear;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DateQuestion::class, 'Google_Service_Forms_DateQuestion');
