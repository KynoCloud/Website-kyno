<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Pdp\Domain;
use Pdp\TopLevelDomains;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    private function getDomainTLD(Request $request)
    {
        $topLevelDomains = TopLevelDomains::fromPath('https://data.iana.org/TLD/tlds-alpha-by-domain.txt');

        $RequestDomain = $request->getHost();
        try {
            $domain = Domain::fromIDNA2008($RequestDomain);
            $result = $topLevelDomains->resolve($domain);

            $tld = "." . $result->suffix()->toString();
            $domain = $result->secondLevelDomain()->toString();
        } catch (\Throwable $th) {
            $domain = "kynocloud";
            $tld = ".com";
        }


        return [
            'domain' => $domain,
            'tld' => $tld
        ];
    }

    function render($request, Throwable $exception)
    {
        $data = $this->getDomainTLD($request);
        if ($this->isHttpException($exception)) {
            $statusCode = method_exists($exception, 'getStatusCode') ? method_exists($exception, 'getStatusCode') : 500;
            if ($statusCode == 404) {
                return response()->view('errors.404', [$data], 404);
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}