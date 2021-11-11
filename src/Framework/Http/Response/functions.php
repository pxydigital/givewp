<?php

namespace Give\Framework\Http\Response;


if (! function_exists('response')) {
  /**
     * Return a new response from the application.
     *
     * @param  string  $content
     * @param  int  $status
     * @param  array  $headers
     * @return Response|ResponseFactory
     */
    function response($content = '', $status = 200, array $headers = [])
    {
        /** @var ResponseFactory $factory */
        $factory = give(ResponseFactory::class);

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($content, $status, $headers);
    }
}