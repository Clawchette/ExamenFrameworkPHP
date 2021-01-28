<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation;

use Cloudinary\ClassUtils;
use Cloudinary\Transformation\Parameter\Dimensions\Dpr;

/**
 * Trait DeliveryBuilderTrait
 *
 * @api
 */
trait DeliveryBuilderTrait
{
    use ColorSpaceParamTrait;

    /**
     * Sets the file format.
     *
     * @param string|Format|mixed $format The file format.
     *
     * @return Format
     */
    public static function format($format)
    {
        return ClassUtils::verifyInstance($format, Format::class);
    }

    /**
     * Controls the compression quality for images and videos.
     *
     * Reducing the quality is a trade-off between visual quality and file size.
     *
     * @param int|Quality|mixed         $level  The level of the quality. (Range 1 to 100)
     * @param null|string $preset A set level of automatic quality.  Use the constants defined in the QualityParam
     *                            class.
     *
     * @return Quality
     *
     * @see \Cloudinary\Transformation\QualityParam
     */
    public static function quality($level, $preset = null)
    {
        return ClassUtils::verifyInstance($level, Quality::class, null, $preset);
    }

    /**
     * Deliver the image in the specified device pixel ratio.
     *
     * @param Dpr|int|string $dpr The DPR (Device Pixel Ratio). Any positive float value.
     *
     * @return Dpr
     */
    public static function dpr($dpr)
    {
        return ClassUtils::verifyInstance($dpr, Dpr::class);
    }

    /**
     * Controls the density to use when delivering an image or when converting a vector file such as a PDF or EPS
     * document to a web image delivery format.
     *
     * @param int|string $density The density in dpi.
     *
     * @return Density
     */
    public static function density($density)
    {
        return ClassUtils::verifyInstance($density, Density::class);
    }
}
