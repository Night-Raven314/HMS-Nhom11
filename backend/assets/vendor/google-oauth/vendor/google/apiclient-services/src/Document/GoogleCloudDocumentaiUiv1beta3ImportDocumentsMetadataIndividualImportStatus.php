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

namespace Google\Service\Document;

class GoogleCloudDocumentaiUiv1beta3ImportDocumentsMetadataIndividualImportStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $inputGcsSource;
  protected $outputDocumentIdType = GoogleCloudDocumentaiUiv1beta3DocumentId::class;
  protected $outputDocumentIdDataType = '';
  /**
   * @var string
   */
  public $outputGcsDestination;
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';

  /**
   * @param string
   */
  public function setInputGcsSource($inputGcsSource)
  {
    $this->inputGcsSource = $inputGcsSource;
  }
  /**
   * @return string
   */
  public function getInputGcsSource()
  {
    return $this->inputGcsSource;
  }
  /**
   * @param GoogleCloudDocumentaiUiv1beta3DocumentId
   */
  public function setOutputDocumentId(GoogleCloudDocumentaiUiv1beta3DocumentId $outputDocumentId)
  {
    $this->outputDocumentId = $outputDocumentId;
  }
  /**
   * @return GoogleCloudDocumentaiUiv1beta3DocumentId
   */
  public function getOutputDocumentId()
  {
    return $this->outputDocumentId;
  }
  /**
   * @param string
   */
  public function setOutputGcsDestination($outputGcsDestination)
  {
    $this->outputGcsDestination = $outputGcsDestination;
  }
  /**
   * @return string
   */
  public function getOutputGcsDestination()
  {
    return $this->outputGcsDestination;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setStatus(GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiUiv1beta3ImportDocumentsMetadataIndividualImportStatus::class, 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3ImportDocumentsMetadataIndividualImportStatus');
