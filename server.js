// server.js
import express from 'express';
import { createServer } from 'http';
import { Server } from 'socket.io';
import cors from 'cors';

const app = express();
app.use(cors());

const server = createServer(app);
const io = new Server(server, {
    cors: {
        origin: '*',
        methods: ['GET', 'POST']
    }
});

const users = {}; // Store user socket mappings {userId: socketId}

io.on('connection', (socket) => {
    // When a user connects, register them with their userId
    socket.on('register', (userId) => {
        users[userId] = socket.id;
        console.log(`User ${userId} connected with socket ID: ${socket.id}`);
    });

    socket.on('sendMessage', ({ message, targetUserId, senderId, audioBlob }) => {
        const targetSocketId = users[targetUserId];

        // Check if the message contains an audio file
        const isAudioMessage = !!audioBlob;

        // Send message or audio to the target user (receiver)
        if (targetSocketId) {
            io.to(targetSocketId).emit('receiveMessage', {
                message, // Could be empty if it's an audio message
                from: senderId,
                to: targetUserId,
                audioBlob, // Send the audio blob if available
                senderSide: false // Indicates message is coming from another user
            });
        } else {
            console.log(`Target user with ID ${targetUserId} is not connected.`);
        }

        // Send the message or audio to the sender to show it on their side
        io.to(socket.id).emit('receiveMessage', {
            message,
            from: senderId,
            to: targetUserId,
            audioBlob, // Send the audio blob if available
            senderSide: true // Indicates message is from the sender
        });
    });
    
    socket.on('disconnect', () => {
        for (const [userId, socketId] of Object.entries(users)) {
            if (socketId === socket.id) {
                console.log(`User ${userId} disconnected`);
                delete users[userId];
                break;
            }
        }
    });
});

server.listen(3000, () => {
    console.log('Server running on port 3000');
});
