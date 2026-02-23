<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AiChatLog;
use Illuminate\Http\Request;

class AiChatController extends Controller
{
    /**
     * Send message to AI assistant (stub for now)
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');

        // Save user message
        AiChatLog::create([
            'user_id' => $request->user()->id,
            'role' => 'user',
            'message' => $userMessage
        ]);

        // TODO: Integrate OpenAI API later
        // For now, return a mock response
        $aiResponse = $this->getMockResponse($userMessage);

        // Save AI response
        AiChatLog::create([
            'user_id' => $request->user()->id,
            'role' => 'assistant',
            'message' => $aiResponse
        ]);

        return response()->json([
            'success' => true,
            'response' => $aiResponse
        ], 200);
    }

    /**
     * Get chat history
     */
    public function history(Request $request)
    {
        $history = AiChatLog::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'count' => $history->count(),
            'history' => $history
        ], 200);
    }

    /**
     * Clear chat history
     */
    public function clear(Request $request)
    {
        AiChatLog::where('user_id', $request->user()->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Chat history cleared'
        ], 200);
    }

    /**
     * Mock AI responses (temporary)
     */
    private function getMockResponse($message)
    {
        $message = strtolower($message);

        if (str_contains($message, 'caregiver') || str_contains($message, 'find')) {
            return "I can help you find a caregiver! You can browse our caregiver directory to see available professionals. What specific type of care are you looking for?";
        }

        if (str_contains($message, 'book') || str_contains($message, 'appointment')) {
            return "To book an appointment, please select a caregiver from our directory and choose your preferred date and time. I'm here to help if you have any questions!";
        }

        if (str_contains($message, 'payment') || str_contains($message, 'cost')) {
            return "Our caregivers have different hourly rates listed on their profiles. Payment is processed securely after you book an appointment. You can see the total cost before confirming your booking.";
        }

        if (str_contains($message, 'hello') || str_contains($message, 'hi')) {
            return "Hello! Welcome to CareConnect. I'm here to help you find the perfect caregiver for your needs. How can I assist you today?";
        }

        return "I'm your CareConnect assistant! I can help you find caregivers, book appointments, and answer questions about our services. What would you like to know?";
    }
}