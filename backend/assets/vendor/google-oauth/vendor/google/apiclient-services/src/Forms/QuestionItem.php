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

namespace Google\Service\Forms;

class QuestionItem extends \Google\Model
{
  protected $imageType = Image::class;
  protected $imageDataType = '';
  protected $questionType = Question::class;
  protected $questionDataType = '';

  /**
   * @param Image
   */
  public function setImage(Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Question
   */
  public function setQuestion(Question $question)
  {
    $this->question = $question;
  }
  /**
   * @return Question
   */
  public function getQuestion()
  {
    return $this->question;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QuestionItem::class, 'Google_Service_Forms_QuestionItem');
