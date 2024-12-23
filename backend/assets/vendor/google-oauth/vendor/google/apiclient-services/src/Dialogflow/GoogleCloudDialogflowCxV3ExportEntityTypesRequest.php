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

class GoogleCloudDialogflowCxV3ExportEntityTypesRequest extends \Google\Collection
{
  protected $collection_key = 'entityTypes';
  /**
   * @var string
   */
  public $dataFormat;
  /**
   * @var string[]
   */
  public $entityTypes;
  /**
   * @var bool
   */
  public $entityTypesContentInline;
  /**
   * @var string
   */
  public $entityTypesUri;
  /**
   * @var string
   */
  public $languageCode;

  /**
   * @param string
   */
  public function setDataFormat($dataFormat)
  {
    $this->dataFormat = $dataFormat;
  }
  /**
   * @return string
   */
  public function getDataFormat()
  {
    return $this->dataFormat;
  }
  /**
   * @param string[]
   */
  public function setEntityTypes($entityTypes)
  {
    $this->entityTypes = $entityTypes;
  }
  /**
   * @return string[]
   */
  public function getEntityTypes()
  {
    return $this->entityTypes;
  }
  /**
   * @param bool
   */
  public function setEntityTypesContentInline($entityTypesContentInline)
  {
    $this->entityTypesContentInline = $entityTypesContentInline;
  }
  /**
   * @return bool
   */
  public function getEntityTypesContentInline()
  {
    return $this->entityTypesContentInline;
  }
  /**
   * @param string
   */
  public function setEntityTypesUri($entityTypesUri)
  {
    $this->entityTypesUri = $entityTypesUri;
  }
  /**
   * @return string
   */
  public function getEntityTypesUri()
  {
    return $this->entityTypesUri;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ExportEntityTypesRequest::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExportEntityTypesRequest');
