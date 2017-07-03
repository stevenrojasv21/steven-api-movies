<?php

namespace App\Http\Middleware;

use Closure;

class ResponseFormatter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Perform action

        $responseContent = json_decode($response->getContent(), true);

        $rows = (isset($responseContent['content']['results'])) ? $responseContent['content']['results'] : [];

        foreach ($rows as &$row) {
            $imagePath  = null;

            $imagePath = (isset($row['backdrop_path'])) ? $row['backdrop_path']: $imagePath;
            $imagePath = (isset($row['poster_path'])) ? $row['poster_path']: $imagePath;
            $imagePath = (isset($row['profile_path'])) ? $row['profile_path']: $imagePath;

            $row['image_path'] = $imagePath;
        }
        unset($row);

        if (isset($responseContent['content']['results'])) {
            $responseContent['content']['results'] = $rows;
        }

        $response->setContent($responseContent);

        return $response;
    }
}
