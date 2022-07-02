<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index(): Response
    {
        return new Response(
            '
            <html lang="en">
                <body>
                    <h1>Hello Symfony 4 World</h1>
                </body>
            </html>
        '
        );
    }
}
