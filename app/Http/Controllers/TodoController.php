<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * GET
     */
    public function index(Request $request)
    {
        // Determine how many results to return per page
        $perPage = $request->has('perPage') ? (int) $request->perPage : 10; // If perPage is not present it will default to 10
    
        // Create a query to retrieve all Todo items
        $query = Todo::query();
    
        // Filter by completed status if requested in the query string
        if ($request->has('completed')) {
            $query->where('completed', (bool) $request->completed);
        }
    
        // Filter by title if requested in the query string
        if ($request->has('title')) {
            $query->where('title', 'like', '%'.$request->title.'%');
        }
    
        // Paginate the results and return as a JSON response
        $todos = $query->paginate($perPage);
    
        return response()->json($todos);
    }
    
    

    /**
     * POST
     */
    public function store(Request $request)
    {
        // Using validate make title & completed required
        $request->validate([ 
            "title" => "required",
         ]);
        // If validated create new todo
        return Todo::create($request->all());
    }

    /**
     * GET {ID}
     */
    public function show(string $id)
    {
        // Find todo item using provided $id
        return Todo::find($id);
    }

    /**
     * PUT
     */
    public function update(Request $request, string $id)
    {
        // Validate the input data
        $validatedData = $request->validate([
            "title" => "required",
        ]);

        // Find todo item using provided $id
        $todo = Todo::find($id);

        // If todo item not found, return 404 response
        if (!$todo) {
            return response()->json(['error' => 'Todo not found'], 404);
        }

        // Update the todo item
        $todo->update($validatedData);

        return $todo;
    }
    
    /**
     * DELETE
     */
    public function destroy(string $id)
    {
        // Check if deletetion is successful if so return a noContent response
        if (Todo::destroy($id)) {
            return response()->noContent();
        }
    }
}
