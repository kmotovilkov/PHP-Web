<?php
function getUserByAuthId(PDO $db, string $authId): int
{
    $query = "SELECT user_id FROM authentications WHERE auth_string=?";
    $stmt = $db->prepare($query);
    $stmt->execute([$authId]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data && $data['user_id']) {
        return (int)$data['user_id'];
    }
    return -1;
}

function issueAuthenticatinoString(PDO $db, int $userId): string
{
    $query = "SELECT auth_string FROM authentications WHERE user_id=?";
    $stmt = $db->prepare($query);
    $stmt->execute([$userId]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data && $data['auth_string']) {
        return $data['auth_string'];
    }
    $authString = uniqid();
    $query = "INSERT INTO  authentications (auth_string, user_id) values (?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$authString, $userId]);
    return $authString;
}

function verifyCredentials(PDO $db, string $username, string $password): int
{
    $query = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    if (!$stmt->execute([$username])) {
        return -1;
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $passwordHash = $user['password'];
    $result = password_verify($password, $passwordHash);
    if ($result) {
        return (int)$user['id'];
    }
    return -1;
}

function register(PDO $db, string $username, string $password): bool
{
    $query = "INSERT INTO users(username, password ) VALUES (?, ?)";
    $stmt = $db->prepare($query);
    $result = $stmt->execute([$username, password_hash($password, PASSWORD_ARGON2I)]);
    return $result;
}
