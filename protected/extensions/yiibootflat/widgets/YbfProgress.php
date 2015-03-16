<?php

/*
 * Copyright (c) 2014 Sérgio Lopes <knitter.is@gmail.com>
 * Yiibootflat, the extension that integrates Bootflat into Yii.
 * 
 * MIT licensed, http://opensource.org/licenses/MIT.
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * @author Sérgio Lopes <knitter.is@gmail.com>
 * @copyright &copy; 2014, Sérgio Lopes
 * @license http://opensource.org/licenses/MIT
 * @version 1.0
 */
class YbfProgress extends CWidget {

    const
            TYPE_DEFAULT = 'default',
            TYPE_PRIMARY = 'primary',
            TYPE_SUCCESS = 'success',
            TYPE_INFO = 'info',
            TYPE_WARNING = 'warning',
            TYPE_DANGER = 'danger',
            TYPE_LINK = 'link';

    private static $CLASS_PREFIX = 'progress-bar-';
    public $type;
    public $value;
    public $min;
    public $max;
    public $label;
    public $encodeLabel = true;
    public $showText = false;
    public $class;
    public $striped = false;
    public $active;

    public function init() {
        $classes = array('progress-bar');

        $types = array(
            self::TYPE_DEFAULT, self::TYPE_PRIMARY, self::TYPE_SUCCESS,
            self::TYPE_INFO, self::TYPE_WARNING, self::TYPE_DANGER, self::TYPE_LINK
        );

        if (in_array($this->type, $types)) {
            $classes[] = (self::$CLASS_PREFIX . $this->type);
        }

        if (!empty($this->class)) {
            $classes = array_merge($classes, explode(' ', $this->class));
        }
        $this->class = implode(' ', $classes);

        if (empty($this->min)) {
            $this->min = 0;
        }

        if (empty($this->max)) {
            $this->max = 100;
        }

        if ($this->encodeLabel) {
            $this->label = CHtml::encode($this->label);
        }
    }

    public function run() {
        ob_start();
        echo '<div class="progress', ($this->striped ? ' progress-striped' : ''),
        ($this->active ? ' active' : ''), '"><div class="', $this->class,
        '" role="progressbar" aria-valuenow="', $this->value,
        '" aria-valuemin="', $this->min, '" aria-valuemax="', $this->max,
        '" style="width: ', $this->value, '%;">';

        if (!empty($this->label)) {
            echo '<span', (!$this->showText ? ' class="sr-only"' : ''), '>', $this->label, '</span>';
        } else if ($this->showText) {
            echo $this->value, '%';
        }
        echo '</div></div>';

        echo ob_get_clean();
    }

}
