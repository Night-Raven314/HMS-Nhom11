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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\Account;
use Google\Service\Dfareporting\AccountsListResponse;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $accounts = $dfareportingService->accounts;
 *  </code>
 */
class Accounts extends \Google\Service\Resource
{
  /**
   * Gets one account by ID. (accounts.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Account ID.
   * @param array $optParams Optional parameters.
   * @return Account
   * @throws \Google\Service\Exception
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Account::class);
  }
  /**
   * Retrieves the list of accounts, possibly filtered. This method supports
   * paging. (accounts.listAccounts)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool active Select only active accounts. Don't set this field to
   * select both active and non-active accounts.
   * @opt_param string ids Select only accounts with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "account*2015" will return objects
   * with names like "account June 2015", "account April 2015", or simply "account
   * 2015". Most of the searches also add wildcards implicitly at the start and
   * the end of the search string. For example, a search string of "account" will
   * match objects with name "my account", "account 2015", or simply "account".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return AccountsListResponse
   * @throws \Google\Service\Exception
   */
  public function listAccounts($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AccountsListResponse::class);
  }
  /**
   * Updates an existing account. This method supports patch semantics.
   * (accounts.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Required. Account ID.
   * @param Account $postBody
   * @param array $optParams Optional parameters.
   * @return Account
   * @throws \Google\Service\Exception
   */
  public function patch($profileId, $id, Account $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Account::class);
  }
  /**
   * Updates an existing account. (accounts.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Account $postBody
   * @param array $optParams Optional parameters.
   * @return Account
   * @throws \Google\Service\Exception
   */
  public function update($profileId, Account $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Account::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accounts::class, 'Google_Service_Dfareporting_Resource_Accounts');
