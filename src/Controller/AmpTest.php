<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Lullabot\AMP\AMP;
use Lullabot\AMP\Validate\Scope;

class AmpTest extends AbstractController
{
    /**
     * @Route("amp/test1")
     */
    public function test1(): Response
    {
        // Create an AMP object
        $amp = new AMP();

        // Notice this is a HTML fragment, i.e. anything that can appear below <body>
        $html =
            '<p><a href="javascript:run();">Run</a></p>' . PHP_EOL .
            '<p><a style="margin: 2px;" href="http://www.cnn.com" target="_parent">CNN</a></p>' . PHP_EOL .
            '<p><a href="http://www.bbcnews.com" target="_blank">BBC</a></p>' . PHP_EOL .
            '<p><INPUT type="submit" value="submit"></p>' . PHP_EOL .
            '<p>This is a <div onmouseover="hello();">sample</div> paragraph</p>';

        // Load up the HTML into the AMP object
        // Note that we only support UTF-8 or ASCII string input and output. (UTF-8 is a superset of ASCII) 
        $amp->loadHtml($html);

        // If you're feeding it a complete document use the following line instead
        // $amp->loadHtml($html, ['scope' => Scope::HTML_SCOPE]);

        // If you want some performance statistics (see https://github.com/Lullabot/amp-library/issues/24)
        // $amp->loadHtml($html, ['add_stats_html_comment' => true]);

        // Convert to AMP HTML and store output in a variable
        $amp_html = $amp->convertToAmpHtml();
        
        return new Response($amp_html);
    }

    /**
     * @Route("amp/test2")
     */
    public function test2(): Response
    {
        $amp = new AMP();

        $html = file_get_contents(rtrim(dirname(__DIR__), '\/scr').'/public/temp/amp_test1.txt');

        $amp->loadHtml($html);

        $amp_html = $amp->convertToAmpHtml();

        return new Response($amp_html);
        // return new Response($html);
    }
}