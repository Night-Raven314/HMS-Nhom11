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

namespace Google\Service\CloudKMS;

class RawDecryptRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $additionalAuthenticatedData;
  /**
   * @var string
   */
  public $additionalAuthenticatedDataCrc32c;
  /**
   * @var string
   */
  public $ciphertext;
  /**
   * @var string
   */
  public $ciphertextCrc32c;
  /**
   * @var string
   */
  public $initializationVector;
  /**
   * @var string
   */
  public $initializationVectorCrc32c;
  /**
   * @var int
   */
  public $tagLength;

  /**
   * @param string
   */
  public function setAdditionalAuthenticatedData($additionalAuthenticatedData)
  {
    $this->additionalAuthenticatedData = $additionalAuthenticatedData;
  }
  /**
   * @return string
   */
  public function getAdditionalAuthenticatedData()
  {
    return $this->additionalAuthenticatedData;
  }
  /**
   * @param string
   */
  public function setAdditionalAuthenticatedDataCrc32c($additionalAuthenticatedDataCrc32c)
  {
    $this->additionalAuthenticatedDataCrc32c = $additionalAuthenticatedDataCrc32c;
  }
  /**
   * @return string
   */
  public function getAdditionalAuthenticatedDataCrc32c()
  {
    return $this->additionalAuthenticatedDataCrc32c;
  }
  /**
   * @param string
   */
  public function setCiphertext($ciphertext)
  {
    $this->ciphertext = $ciphertext;
  }
  /**
   * @return string
   */
  public function getCiphertext()
  {
    return $this->ciphertext;
  }
  /**
   * @param string
   */
  public function setCiphertextCrc32c($ciphertextCrc32c)
  {
    $this->ciphertextCrc32c = $ciphertextCrc32c;
  }
  /**
   * @return string
   */
  public function getCiphertextCrc32c()
  {
    return $this->ciphertextCrc32c;
  }
  /**
   * @param string
   */
  public function setInitializationVector($initializationVector)
  {
    $this->initializationVector = $initializationVector;
  }
  /**
   * @return string
   */
  public function getInitializationVector()
  {
    return $this->initializationVector;
  }
  /**
   * @param string
   */
  public function setInitializationVectorCrc32c($initializationVectorCrc32c)
  {
    $this->initializationVectorCrc32c = $initializationVectorCrc32c;
  }
  /**
   * @return string
   */
  public function getInitializationVectorCrc32c()
  {
    return $this->initializationVectorCrc32c;
  }
  /**
   * @param int
   */
  public function setTagLength($tagLength)
  {
    $this->tagLength = $tagLength;
  }
  /**
   * @return int
   */
  public function getTagLength()
  {
    return $this->tagLength;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RawDecryptRequest::class, 'Google_Service_CloudKMS_RawDecryptRequest');
