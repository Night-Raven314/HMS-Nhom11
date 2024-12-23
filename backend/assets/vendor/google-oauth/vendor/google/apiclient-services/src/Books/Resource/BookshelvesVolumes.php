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

namespace Google\Service\Books\Resource;

use Google\Service\Books\Volumes as VolumesModel;

/**
 * The "volumes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $volumes = $booksService->bookshelves_volumes;
 *  </code>
 */
class BookshelvesVolumes extends \Google\Service\Resource
{
  /**
   * Retrieves volumes in a specific bookshelf for the specified user.
   * (volumes.listBookshelvesVolumes)
   *
   * @param string $userId ID of user for whom to retrieve bookshelf volumes.
   * @param string $shelf ID of bookshelf to retrieve volumes.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param bool showPreorders Set to true to show pre-ordered books. Defaults
   * to false.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string startIndex Index of the first element to return (starts at
   * 0)
   * @return VolumesModel
   * @throws \Google\Service\Exception
   */
  public function listBookshelvesVolumes($userId, $shelf, $optParams = [])
  {
    $params = ['userId' => $userId, 'shelf' => $shelf];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], VolumesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BookshelvesVolumes::class, 'Google_Service_Books_Resource_BookshelvesVolumes');
