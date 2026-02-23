<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Caregiver;
use Illuminate\Http\Request;

class CaregiverController extends Controller
{
    /**
     * Get all caregivers with filters
     */
    public function index(Request $request)
    {
        $query = Caregiver::with('user:id,name,email,phone,profile_photo_url,bio');

        // Filter by specialization
        if ($request->has('specialization') && $request->specialization != '') {
            $query->where('specialization', 'like', '%' . $request->specialization . '%');
        }

        // Filter by max hourly rate
        if ($request->has('max_rate') && $request->max_rate != '') {
            $query->where('hourly_rate', '<=', $request->max_rate);
        }

        // Filter by minimum rating
        if ($request->has('min_rating') && $request->min_rating != '') {
            $query->where('average_rating', '>=', $request->min_rating);
        }

        // Search by name
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Sort by rating (highest first) or hourly rate (lowest first)
        $sortBy = $request->input('sort_by', 'rating');
        if ($sortBy === 'rating') {
            $query->orderBy('average_rating', 'desc');
        } elseif ($sortBy === 'price') {
            $query->orderBy('hourly_rate', 'asc');
        }

        $caregivers = $query->get();

        return response()->json([
            'success' => true,
            'count' => $caregivers->count(),
            'caregivers' => $caregivers
        ], 200);
    }

    /**
     * Get single caregiver profile
     */
    public function show($id)
    {
        $caregiver = Caregiver::with('user:id,name,email,phone,profile_photo_url,bio')
            ->find($id);

        if (!$caregiver) {
            return response()->json([
                'success' => false,
                'message' => 'Caregiver not found'
            ], 404);
        }

        // Get reviews count and average (if you add reviews later)
        // For now, return the caregiver data
        return response()->json([
            'success' => true,
            'caregiver' => $caregiver
        ], 200);
    }

    /**
     * Get caregiver's availability
     */
    public function availability($id)
    {
        $caregiver = Caregiver::find($id);

        if (!$caregiver) {
            return response()->json([
                'success' => false,
                'message' => 'Caregiver not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'availability' => $caregiver->availability ?? []
        ], 200);
    }
}