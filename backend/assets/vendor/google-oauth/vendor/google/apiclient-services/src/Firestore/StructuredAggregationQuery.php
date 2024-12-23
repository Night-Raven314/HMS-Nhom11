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

namespace Google\Service\Firestore;

class StructuredAggregationQuery extends \Google\Collection
{
  protected $collection_key = 'aggregations';
  protected $aggregationsType = Aggregation::class;
  protected $aggregationsDataType = 'array';
  protected $structuredQueryType = StructuredQuery::class;
  protected $structuredQueryDataType = '';

  /**
   * @param Aggregation[]
   */
  public function setAggregations($aggregations)
  {
    $this->aggregations = $aggregations;
  }
  /**
   * @return Aggregation[]
   */
  public function getAggregations()
  {
    return $this->aggregations;
  }
  /**
   * @param StructuredQuery
   */
  public function setStructuredQuery(StructuredQuery $structuredQuery)
  {
    $this->structuredQuery = $structuredQuery;
  }
  /**
   * @return StructuredQuery
   */
  public function getStructuredQuery()
  {
    return $this->structuredQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StructuredAggregationQuery::class, 'Google_Service_Firestore_StructuredAggregationQuery');
