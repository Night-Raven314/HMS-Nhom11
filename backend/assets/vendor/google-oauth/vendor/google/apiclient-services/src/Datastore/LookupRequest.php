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

namespace Google\Service\Datastore;

class LookupRequest extends \Google\Collection
{
  protected $collection_key = 'keys';
  /**
   * @var string
   */
  public $databaseId;
  protected $keysType = Key::class;
  protected $keysDataType = 'array';
  protected $propertyMaskType = PropertyMask::class;
  protected $propertyMaskDataType = '';
  protected $readOptionsType = ReadOptions::class;
  protected $readOptionsDataType = '';

  /**
   * @param string
   */
  public function setDatabaseId($databaseId)
  {
    $this->databaseId = $databaseId;
  }
  /**
   * @return string
   */
  public function getDatabaseId()
  {
    return $this->databaseId;
  }
  /**
   * @param Key[]
   */
  public function setKeys($keys)
  {
    $this->keys = $keys;
  }
  /**
   * @return Key[]
   */
  public function getKeys()
  {
    return $this->keys;
  }
  /**
   * @param PropertyMask
   */
  public function setPropertyMask(PropertyMask $propertyMask)
  {
    $this->propertyMask = $propertyMask;
  }
  /**
   * @return PropertyMask
   */
  public function getPropertyMask()
  {
    return $this->propertyMask;
  }
  /**
   * @param ReadOptions
   */
  public function setReadOptions(ReadOptions $readOptions)
  {
    $this->readOptions = $readOptions;
  }
  /**
   * @return ReadOptions
   */
  public function getReadOptions()
  {
    return $this->readOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LookupRequest::class, 'Google_Service_Datastore_LookupRequest');
