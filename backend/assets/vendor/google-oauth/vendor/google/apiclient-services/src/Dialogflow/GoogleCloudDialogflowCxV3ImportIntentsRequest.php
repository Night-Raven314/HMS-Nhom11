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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3ImportIntentsRequest extends \Google\Model
{
  protected $intentsContentType = GoogleCloudDialogflowCxV3InlineSource::class;
  protected $intentsContentDataType = '';
  /**
   * @var string
   */
  public $intentsUri;
  /**
   * @var string
   */
  public $mergeOption;

  /**
   * @param GoogleCloudDialogflowCxV3InlineSource
   */
  public function setIntentsContent(GoogleCloudDialogflowCxV3InlineSource $intentsContent)
  {
    $this->intentsContent = $intentsContent;
  }
  /**
   * @return GoogleCloudDialogflowCxV3InlineSource
   */
  public function getIntentsContent()
  {
    return $this->intentsContent;
  }
  /**
   * @param string
   */
  public function setIntentsUri($intentsUri)
  {
    $this->intentsUri = $intentsUri;
  }
  /**
   * @return string
   */
  public function getIntentsUri()
  {
    return $this->intentsUri;
  }
  /**
   * @param string
   */
  public function setMergeOption($mergeOption)
  {
    $this->mergeOption = $mergeOption;
  }
  /**
   * @return string
   */
  public function getMergeOption()
  {
    return $this->mergeOption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ImportIntentsRequest::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ImportIntentsRequest');
