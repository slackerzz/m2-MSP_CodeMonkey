<?php
/**
 * IDEALIAGroup srl - MageSpecialist
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@idealiagroup.com so we can send you a copy immediately.
 *
 * @category   MSP
 * @package    MSP_CodeMonkey
 * @copyright  Copyright (c) 2016 IDEALIAGroup srl - MageSpecialist (http://www.magespecialist.it)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace MSP\CodeMonkey\Model;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem\Io\File;

class Filesystem
{
    protected $file;

    public function __construct(
        File $file
    ) {
        $this->file = $file;
    }

    /**
     * Throws an exception if a file already exists
     * @param $files
     * @return bool
     * @throws LocalizedException
     */
    public function assertNotExisting($files)
    {
        if (!is_array($files)) {
            $files = [$files];
        }

        foreach ($files as $file) {
            if ($this->file->fileExists($file)) {
                throw new LocalizedException(__('File %1 already exists', $file));
            }
        }

        return true;
    }
}
