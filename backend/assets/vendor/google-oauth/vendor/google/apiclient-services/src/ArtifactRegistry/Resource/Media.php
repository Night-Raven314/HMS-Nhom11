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

namespace Google\Service\ArtifactRegistry\Resource;

use Google\Service\ArtifactRegistry\DownloadFileResponse;

/**
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google\Service\ArtifactRegistry(...);
 *   $media = $artifactregistryService->media;
 *  </code>
 */
class Media extends \Google\Service\Resource
{
  /**
   * Download a file. (media.download)
   *
   * @param string $name Required. The name of the file to download.
   * @param array $optParams Optional parameters.
   * @return DownloadFileResponse
   * @throws \Google\Service\Exception
   */
  public function download($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('download', [$params], DownloadFileResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Media::class, 'Google_Service_ArtifactRegistry_Resource_Media');
