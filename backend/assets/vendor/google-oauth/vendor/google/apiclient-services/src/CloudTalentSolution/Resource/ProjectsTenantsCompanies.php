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

namespace Google\Service\CloudTalentSolution\Resource;

use Google\Service\CloudTalentSolution\Company;
use Google\Service\CloudTalentSolution\JobsEmpty;
use Google\Service\CloudTalentSolution\ListCompaniesResponse;

/**
 * The "companies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $jobsService = new Google\Service\CloudTalentSolution(...);
 *   $companies = $jobsService->projects_tenants_companies;
 *  </code>
 */
class ProjectsTenantsCompanies extends \Google\Service\Resource
{
  /**
   * Creates a new company entity. (companies.create)
   *
   * @param string $parent Required. Resource name of the tenant under which the
   * company is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}", for example,
   * "projects/foo/tenants/bar".
   * @param Company $postBody
   * @param array $optParams Optional parameters.
   * @return Company
   * @throws \Google\Service\Exception
   */
  public function create($parent, Company $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Company::class);
  }
  /**
   * Deletes specified company. Prerequisite: The company has no jobs associated
   * with it. (companies.delete)
   *
   * @param string $name Required. The resource name of the company to be deleted.
   * The format is
   * "projects/{project_id}/tenants/{tenant_id}/companies/{company_id}", for
   * example, "projects/foo/tenants/bar/companies/baz".
   * @param array $optParams Optional parameters.
   * @return JobsEmpty
   * @throws \Google\Service\Exception
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], JobsEmpty::class);
  }
  /**
   * Retrieves specified company. (companies.get)
   *
   * @param string $name Required. The resource name of the company to be
   * retrieved. The format is
   * "projects/{project_id}/tenants/{tenant_id}/companies/{company_id}", for
   * example, "projects/api-test-project/tenants/foo/companies/bar".
   * @param array $optParams Optional parameters.
   * @return Company
   * @throws \Google\Service\Exception
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Company::class);
  }
  /**
   * Lists all companies associated with the project.
   * (companies.listProjectsTenantsCompanies)
   *
   * @param string $parent Required. Resource name of the tenant under which the
   * company is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}", for example,
   * "projects/foo/tenants/bar".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of companies to be returned, at
   * most 100. Default is 100 if a non-positive number is provided.
   * @opt_param string pageToken The starting indicator from which to return
   * results.
   * @opt_param bool requireOpenJobs Set to true if the companies requested must
   * have open jobs. Defaults to false. If true, at most page_size of companies
   * are fetched, among which only those with open jobs are returned.
   * @return ListCompaniesResponse
   * @throws \Google\Service\Exception
   */
  public function listProjectsTenantsCompanies($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCompaniesResponse::class);
  }
  /**
   * Updates specified company. (companies.patch)
   *
   * @param string $name Required during company update. The resource name for a
   * company. This is generated by the service when a company is created. The
   * format is "projects/{project_id}/tenants/{tenant_id}/companies/{company_id}",
   * for example, "projects/foo/tenants/bar/companies/baz".
   * @param Company $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Strongly recommended for the best service
   * experience. If update_mask is provided, only the specified fields in company
   * are updated. Otherwise all the fields are updated. A field mask to specify
   * the company fields to be updated. Only top level fields of Company are
   * supported.
   * @return Company
   * @throws \Google\Service\Exception
   */
  public function patch($name, Company $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Company::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTenantsCompanies::class, 'Google_Service_CloudTalentSolution_Resource_ProjectsTenantsCompanies');
