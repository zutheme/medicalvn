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

class Google_Service_AndroidManagement_PolicyEnforcementRule extends Google_Model
{
  protected $blockActionType = 'Google_Service_AndroidManagement_BlockAction';
  protected $blockActionDataType = '';
  public $settingName;
  protected $wipeActionType = 'Google_Service_AndroidManagement_WipeAction';
  protected $wipeActionDataType = '';

  /**
   * @param Google_Service_AndroidManagement_BlockAction
   */
  public function setBlockAction(Google_Service_AndroidManagement_BlockAction $blockAction)
  {
    $this->blockAction = $blockAction;
  }
  /**
   * @return Google_Service_AndroidManagement_BlockAction
   */
  public function getBlockAction()
  {
    return $this->blockAction;
  }
  public function setSettingName($settingName)
  {
    $this->settingName = $settingName;
  }
  public function getSettingName()
  {
    return $this->settingName;
  }
  /**
   * @param Google_Service_AndroidManagement_WipeAction
   */
  public function setWipeAction(Google_Service_AndroidManagement_WipeAction $wipeAction)
  {
    $this->wipeAction = $wipeAction;
  }
  /**
   * @return Google_Service_AndroidManagement_WipeAction
   */
  public function getWipeAction()
  {
    return $this->wipeAction;
  }
}
