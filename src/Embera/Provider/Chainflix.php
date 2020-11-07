<?php
/**
 * Chainflix.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * Chainflix Provider
 * @link https://*.chainflix.net
 */
class Chainflix extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.chainflix.net/video/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.chainflix.net'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~chainflix\.net/video(/embed/?)?\?contentId([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->setHost('chainflix.net');
        $url->convertToHttps();
        $url->removeLastSlash();
        return $url;
    }
}
