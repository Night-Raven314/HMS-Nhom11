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

namespace Google\Service\AndroidManagement\Resource;

use Google\Service\AndroidManagement\Application;

/**
 * The "applications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google\Service\AndroidManagement(...);
 *   $applications = $androidmanagementService->enterprises_applications;
 *  </code>
 */
class EnterprisesApplications extends \Google\Service\Resource
{
  /**
   * Gets info about an application. (applications.get)
   *
   * @param string $name The name of the application in the form
   * enterprises/{enterpriseId}/applications/{package_name}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The preferred language for localized
   * application info, as a BCP47 tag (e.g. "en-US", "de"). If not specified the
   * default language of the application will be used.
   * @return Application
   * @throws \Google\Service\Exception
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Application::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterprisesApplications::class, 'Google_Service_AndroidManagement_Resource_EnterprisesApplications');
