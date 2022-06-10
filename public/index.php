<?php
namespace vimuki;

use vimuki\Head\HeadIndex;
use vimuki\Header\HeaderIndex;
use vimuki\Footer\FooterIndex;

require __DIR__ . "/config.php";

HeadIndex::getIndex();
new Init();


