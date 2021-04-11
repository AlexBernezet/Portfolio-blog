<?php

namespace Tests\Services;

use App\Services\PostService;
use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
//    use WithFaker;

    private Generator $faker;

    protected function setUp(): void
    {

        parent::setUp();
    }

    /**
     * @dataProvider ContentProvider
     * @param $content
     */
    public function testCalculateReadTime($content): void {
        $read_time = PostService::calculateReadTime($content);
        $contentLength = count(explode(' ', $content));
        self::assertEquals(round(($contentLength / 238) * 60), $read_time);
    }

    public function ContentProvider(): array
    {
        $faker = Factory::create();

        return array(
            [$faker->sentence(896)],
            [$faker->sentence(3500)],
            [$faker->sentence(18600)]
        );
    }
}
