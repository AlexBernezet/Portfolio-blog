<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Validators\PostValidator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private PostRepositoryInterface $postsRepository;

    public function __construct(PostRepositoryInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $posts = $this->postsRepository->getAll();
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedInputs = (new PostValidator)->validate($request);
        $this->postsRepository->create($validatedInputs);
        return redirect('/admin/posts')->with('success_message', 'Post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(string $slug): Application|Factory|View|RedirectResponse
    {
        $post = $this->postsRepository->findBySlug($slug);
        if ($post) {
            return view('blog.show', compact('post'));
        }
        return Redirect::route('blog.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedInputs = (new PostValidator)->validate($request);
        $post = $this->postsRepository->update($validatedInputs, $id);

        return Redirect::route("blog.show", $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
