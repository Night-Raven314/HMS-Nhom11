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

namespace Google\Service\Monitoring\Resource;

use Google\Service\Monitoring\ListMonitoredResourceDescriptorsResponse;
use Google\Service\Monitoring\MonitoredResourceDescriptor;

/**
 * The "monitoredResourceDescriptors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google\Service\Monitoring(...);
 *   $monitoredResourceDescriptors = $monitoringService->projects_monitoredResourceDescriptors;
 *  </code>
 */
class ProjectsMonitoredResourceDescriptors extends \Google\Service\Resource
{
  /**
   * Gets a single monitored resource descriptor.
   * (monitoredResourceDescriptors.get)
   *
   * @param string $name Required. The monitored resource descriptor to get. The
   * format is:
   * projects/[PROJECT_ID_OR_NUMBER]/monitoredResourceDescriptors/[RESOURCE_TYPE]
   * The [RESOURCE_TYPE] is a predefined type, such as cloudsql_database.
   * @param array $optParams Optional parameters.
   * @return MonitoredResourceDescriptor
   * @throws \Google\Service\Exception
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MonitoredResourceDescriptor::class);
  }
  /**
   * Lists monitored resource descriptors that match a filter.
   * (monitoredResourceDescriptors.listProjectsMonitoredResourceDescriptors)
   *
   * @param string $name Required. The project
   * (https://cloud.google.com/monitoring/api/v3#project_name) on which to execute
   * the request. The format is: projects/[PROJECT_ID_OR_NUMBER]
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An optional filter
   * (https://cloud.google.com/monitoring/api/v3/filters) describing the
   * descriptors to be returned. The filter can reference the descriptor's type
   * and labels. For example, the following filter returns only Google Compute
   * Engine descriptors that have an id label: resource.type = starts_with("gce_")
   * AND resource.label:id
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @return ListMonitoredResourceDescriptorsResponse
   * @throws \Google\Service\Exception
   */
  public function listProjectsMonitoredResourceDescriptors($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMonitoredResourceDescriptorsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsMonitoredResourceDescriptors::class, 'Google_Service_Monitoring_Resource_ProjectsMonitoredResourceDescriptors');
