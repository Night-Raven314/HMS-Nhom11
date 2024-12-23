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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI;

class ExtendSchemaRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $fileContents;
  /**
   * @var string
   */
  public $gcsPath;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setFileContents($fileContents)
  {
    $this->fileContents = $fileContents;
  }
  /**
   * @return string
   */
  public function getFileContents()
  {
    return $this->fileContents;
  }
  /**
   * @param string
   */
  public function setGcsPath($gcsPath)
  {
    $this->gcsPath = $gcsPath;
  }
  /**
   * @return string
   */
  public function getGcsPath()
  {
    return $this->gcsPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtendSchemaRequest::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ExtendSchemaRequest');
