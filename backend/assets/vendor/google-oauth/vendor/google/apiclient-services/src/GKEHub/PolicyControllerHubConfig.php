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

namespace Google\Service\GKEHub;

class PolicyControllerHubConfig extends \Google\Collection
{
  protected $collection_key = 'exemptableNamespaces';
  /**
   * @var string
   */
  public $auditIntervalSeconds;
  /**
   * @var string
   */
  public $constraintViolationLimit;
  protected $deploymentConfigsType = PolicyControllerPolicyControllerDeploymentConfig::class;
  protected $deploymentConfigsDataType = 'map';
  /**
   * @var string[]
   */
  public $exemptableNamespaces;
  /**
   * @var string
   */
  public $installSpec;
  /**
   * @var bool
   */
  public $logDeniesEnabled;
  protected $monitoringType = PolicyControllerMonitoringConfig::class;
  protected $monitoringDataType = '';
  /**
   * @var bool
   */
  public $mutationEnabled;
  protected $policyContentType = PolicyControllerPolicyContentSpec::class;
  protected $policyContentDataType = '';
  /**
   * @var bool
   */
  public $referentialRulesEnabled;

  /**
   * @param string
   */
  public function setAuditIntervalSeconds($auditIntervalSeconds)
  {
    $this->auditIntervalSeconds = $auditIntervalSeconds;
  }
  /**
   * @return string
   */
  public function getAuditIntervalSeconds()
  {
    return $this->auditIntervalSeconds;
  }
  /**
   * @param string
   */
  public function setConstraintViolationLimit($constraintViolationLimit)
  {
    $this->constraintViolationLimit = $constraintViolationLimit;
  }
  /**
   * @return string
   */
  public function getConstraintViolationLimit()
  {
    return $this->constraintViolationLimit;
  }
  /**
   * @param PolicyControllerPolicyControllerDeploymentConfig[]
   */
  public function setDeploymentConfigs($deploymentConfigs)
  {
    $this->deploymentConfigs = $deploymentConfigs;
  }
  /**
   * @return PolicyControllerPolicyControllerDeploymentConfig[]
   */
  public function getDeploymentConfigs()
  {
    return $this->deploymentConfigs;
  }
  /**
   * @param string[]
   */
  public function setExemptableNamespaces($exemptableNamespaces)
  {
    $this->exemptableNamespaces = $exemptableNamespaces;
  }
  /**
   * @return string[]
   */
  public function getExemptableNamespaces()
  {
    return $this->exemptableNamespaces;
  }
  /**
   * @param string
   */
  public function setInstallSpec($installSpec)
  {
    $this->installSpec = $installSpec;
  }
  /**
   * @return string
   */
  public function getInstallSpec()
  {
    return $this->installSpec;
  }
  /**
   * @param bool
   */
  public function setLogDeniesEnabled($logDeniesEnabled)
  {
    $this->logDeniesEnabled = $logDeniesEnabled;
  }
  /**
   * @return bool
   */
  public function getLogDeniesEnabled()
  {
    return $this->logDeniesEnabled;
  }
  /**
   * @param PolicyControllerMonitoringConfig
   */
  public function setMonitoring(PolicyControllerMonitoringConfig $monitoring)
  {
    $this->monitoring = $monitoring;
  }
  /**
   * @return PolicyControllerMonitoringConfig
   */
  public function getMonitoring()
  {
    return $this->monitoring;
  }
  /**
   * @param bool
   */
  public function setMutationEnabled($mutationEnabled)
  {
    $this->mutationEnabled = $mutationEnabled;
  }
  /**
   * @return bool
   */
  public function getMutationEnabled()
  {
    return $this->mutationEnabled;
  }
  /**
   * @param PolicyControllerPolicyContentSpec
   */
  public function setPolicyContent(PolicyControllerPolicyContentSpec $policyContent)
  {
    $this->policyContent = $policyContent;
  }
  /**
   * @return PolicyControllerPolicyContentSpec
   */
  public function getPolicyContent()
  {
    return $this->policyContent;
  }
  /**
   * @param bool
   */
  public function setReferentialRulesEnabled($referentialRulesEnabled)
  {
    $this->referentialRulesEnabled = $referentialRulesEnabled;
  }
  /**
   * @return bool
   */
  public function getReferentialRulesEnabled()
  {
    return $this->referentialRulesEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolicyControllerHubConfig::class, 'Google_Service_GKEHub_PolicyControllerHubConfig');
