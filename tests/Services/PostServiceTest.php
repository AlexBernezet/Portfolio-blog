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
     * @dataProvider contentProvider
     * @param $content
     */
    public function testCalculateReadTime($content): void {
        $read_time = PostService::calculateReadTime($content);
        $contentLength = count(explode(' ', $content));
        self::assertEquals(round(($contentLength / 238) * 60), $read_time);
    }

    /**
     * @dataProvider titleProvider
     * @param $title
     */
    public function testGenerateSlug($title): void
    {

        $spaceEscapedString = str_replace(' ', '-', $title);
        $expectedSlug = preg_replace('/[^A-Za-z0-9\-]/', '', $spaceEscapedString);
        $generatedSlug = PostService::generateSlug($title);
        self::assertSame($expectedSlug, $generatedSlug);
    }

    public function contentProvider(): array
    {
        $faker = Factory::create();

        return array(
            [$faker->sentence(896)],
            [$faker->sentence(3500)],
            [$faker->sentence(18600)]
        );
    }
    public function titleProvider(): array
    {
        $faker = Factory::create();

        return array(
            [$faker->sentence(10)],
            [$faker->sentence(25)],
            [$faker->sentence(12)]
        );
    }
}
