<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Test\Unit\Transformation\Image;

use Cloudinary\Transformation\CornerRadius;
use Cloudinary\Transformation\RoundCorners;
use PHPUnit\Framework\TestCase;

/**
 * Class ImageShapeTest
 */
final class ImageShapeTest extends TestCase
{
    public function testImageRoundCorners()
    {
        $this->assertEquals(
            'r_max',
            (string)RoundCorners::max()
        );

        $this->assertEquals(
            'r_1:3:0:7',
            (string)RoundCorners::radius(1, 3, 0, 7)
        );

        $this->assertEquals(
            'r_1:3:5',
            (string)RoundCorners::radius(1, 3, 5)
        );

        $this->assertEquals(
            'r_1',
            (string)RoundCorners::radius(1)
        );

        $cr = new RoundCorners(17);

        $cr->topRight(2)->topLeft(1);
        $this->assertEquals(
            'r_1:2',
            (string)$cr
        );

        $cr->topLeft(3)->topRight(4)->bottomLeft(9)->bottomRight(8);
        $this->assertEquals(
            'r_3:4:8:9',
            (string)$cr
        );

        $this->assertEquals(
            'r_1:2',
            (string)RoundCorners::radius(2)->setRadius(CornerRadius::radius(1)->topRight(2))
        );

        $this->assertEquals(
            'r_1:2',
            (string)RoundCorners::radius(1)->setSymmetricRadius(1, 2)
        );

        $this->assertEquals(
            'r_1:2:3',
            (string)RoundCorners::radius(1)->setPartiallySymmetricRadius(1, 2, 3)
        );
    }
}
