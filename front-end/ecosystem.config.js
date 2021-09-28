module.exports = {
    apps : [
        {
            name: "nuxt",
            script: "npm start",
            env: {
                "HOST": "0.0.0.0",
                "PORT": 1780,
                "NODE_ENV": "production",
            }
        }
    ]
}
