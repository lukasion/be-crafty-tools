import express from "express";
import favicons from "favicons";
import JSZip from "jszip";
import path from "path";
import bodyParser from "body-parser";

const app = express();
const port = 3000;
const jsonParser = bodyParser.json()

app.use(express.json({limit: '30mb'}));

app.post("/generate-favicons", jsonParser, async (req, res) => {
    // check if key "upload" exists in request (base64 image)
    if (!req.body.upload) {
        return res.status(400).send({error: "Missing image"});
    }

    // decode base64 image
    const base64Image = req.body.upload.split(";base64,").pop();
    const src = Buffer.from(base64Image, "base64");

    const configuration = {
        path: "/favicons",
        appName: "My app",
        appShortName: "My app",
        appDescription: "A application to test generated favicons at be-crafty.com",
        icons: {
            android: [
                "android-chrome-96x96.png",
                "android-chrome-144x144.png",
                "android-chrome-192x192.png",
                "android-chrome-256x256.png",
                "android-chrome-512x512.png",
            ],
            appleIcon: [
                "apple-touch-icon-180x180.png",
                "apple-touch-icon-167x167.png",
                "apple-touch-icon-120x120.png",
                "apple-touch-icon-precomposed.png",
                "apple-touch-icon.png"
            ],
            appleStartup: [
                "apple-touch-startup-image-640x1136.png",
                "apple-touch-startup-image-750x1334.png",
                "apple-touch-startup-image-1242x2208.png",
            ],
            favicons: true,
            windows: true,
            yandex: true,
        },
    };

    try {
        const response = await favicons(src, configuration);

        // create zip
        const zip = new JSZip();

        await Promise.all(
            response.images.map(
                async (image) =>
                    await zip.file(path.join("favicons", image.name), image.contents),
            ),
        );
        await Promise.all(
            response.files.map(
                async (file) =>
                    await zip.file(path.join("favicons", file.name), file.contents),
            ),
        );

        const content = await zip.generateAsync({type: "nodebuffer"});

        res.set({
            "Content-Type": "application/zip",
            "Content-Disposition": "attachment; filename=favicons.zip",
        });
        res.send(content);
    } catch (error) {
        res.status(500).send({error: "Failed to generate favicons"});
    }
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});