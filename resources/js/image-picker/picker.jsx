import React, {useEffect, useState} from 'react';
import {ImageColorPicker} from 'react-image-color-picker';
import image from '../../images/test.jpg'
import {extractColors} from "extract-colors";
import {FileUploader} from "react-drag-drop-files";

const fileTypes = ["JPG", 'JPEG', 'PNG', 'WEBP'];

const App = () => {
    let [currentColor, setCurrentColor] = useState('');
    let [currentColorHex, setCurrentColorHex] = useState('');
    let [selectedImage, setSelectedImage] = useState(image);
    let [imagePickerText, setImagePickerText] = useState('Choose an image or drag and drop it here');
    let [imageUploaded, setImageUploaded] = useState(false);
    let [colorPalette, setColorPalette] = useState([]);
    const [file, setFile] = useState(null);

    useEffect(() => {
        const request = new XMLHttpRequest();
        request.open('GET', image, true);
        request.responseType = 'blob';
        request.onload = function () {
            const reader = new FileReader();
            reader.readAsDataURL(request.response);
            reader.onload = function (e) {
                extractColors(e.target.result).then(colors => {
                    let palette = colors.map(color => {
                        return color.hex.toUpperCase();
                    })

                    setColorPalette(palette);
                })
            };
        };
        request.send();

        window.adsbygoogle.push({});
    }, []);


    const handleColorPick = (color) => {
        color = color.toUpperCase()
        setCurrentColor(color);

        //convert rgb to hex
        let rgb = color.replace('RGB(', '').replace(')', '').split(',');
        let r = parseInt(rgb[0]);
        let g = parseInt(rgb[1]);
        let b = parseInt(rgb[2]);
        let hex = '#' + r.toString(16) + g.toString(16) + b.toString(16);
        hex = hex.toUpperCase();

        setCurrentColorHex(hex);
    };


    const copyColor = (color) => {
        return (event) => {
            navigator.clipboard.writeText(color);

            event.target.innerText = 'Copied!';

            setTimeout(() => {
                event.target.innerText = 'Copy';
            }, 2000);
        };
    }

    const handleImageChange = (file) => {
        setFile(file);

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                setSelectedImage(e.target.result);

                extractColors(e.target.result).then(colors => {
                    let palette = colors.map(color => {
                        return color.hex.toUpperCase();
                    })

                    setColorPalette(palette);
                })
            };
            reader.readAsDataURL(file);

            setImagePickerText(file.name);
            setImageUploaded(true);

        }
    };

    return (
        <div className={'flex flex-col items-center'}>
            <div className={'w-full mt-6 mb-4'}>
                <h2 className={'text-lg font-bold text-black mb-2'}>
                    Choose a image to pick a color from:
                </h2>

                <p className={'mb-4'}>
                    Select file and click on the image to get the color of the pixel you clicked on.
                </p>

                <FileUploader
                    classes={'!py-14 !min-w-[initial] !max-w-full !w-full !px-6 [&_svg]:!mr-2'}
                    handleChange={handleImageChange}
                    name="file"
                    types={fileTypes}
                    label={imagePickerText}
                    uploadedLabel={'Image selected. Please click on the image to get the color of the pixel you clicked on.'}
                />
            </div>

            <div className="flex flex-col lg:flex-row justify-between gap-12 w-full">
                <div className="mt-6 order-2 lg:order-1">
                    <div className={'flex text-black flex-col gap-2'}>
                        <h3 className={'mb-4 text-lg font-bold'}>
                            Results of the color picker:
                        </h3>
                        <div className={'md:w-96 flex items-center gap-4'}>
                            <p>RGB:</p>

                            <div className={'md:w-20 h-10 rounded-xl'} style={{backgroundColor: currentColor}}>
                                &nbsp;
                            </div>

                            <input type="text" className="p-2 w-full text-black border-2" placeholder="Color"
                                   value={currentColor}
                                   readOnly/>
                            <button
                                className={'bg-blue-500 w-48 text-white p-2'}
                                onClick={copyColor(currentColor)}
                            >
                                Copy
                            </button>
                        </div>
                        <div className={'md:w-96 flex items-center gap-4'}>
                            <p>HEX:</p>

                            <div className={'md:w-20 h-10 rounded-xl'} style={{backgroundColor: currentColorHex}}>
                                &nbsp;
                            </div>

                            <input type="text" className="p-2 w-full text-black border-2" placeholder="Color"
                                   value={currentColorHex}
                                   readOnly/>
                            <button
                                className={'bg-blue-500 w-48 text-white p-2'}
                                onClick={copyColor(currentColorHex)}
                            >
                                Copy
                            </button>
                        </div>

                        <div className="flex flex-col items-center justify-center min-h-[80px] mt-8 mb-6">
                            <p className="text-xs mb-2">
                                Ads by Google
                            </p>
                            <div className="border max-w-[728px] min-h-[80px] w-full">
                                <ins className="adsbygoogle block"
                                     data-ad-client="ca-pub-8621155773680727"
                                     data-ad-slot="3866208994"
                                     data-ad-format="auto"
                                     data-full-width-responsive="true"></ins>
                            </div>
                        </div>

                        <div className={'mt-4'}>
                            <h3 className={'mb-4 font-bold'}>Extracted color palette from the image:</h3>

                            <div className={'flex flex-col gap-4'}>
                                {colorPalette.map((color, index) => (
                                    <div key={index} className={'flex items-center gap-4'}>
                                        <div className={'w-20 h-10 rounded-xl border'}
                                             style={{backgroundColor: color}}>
                                            &nbsp;
                                        </div>

                                        <input type="text" className="p-2 w-full text-black border-2"
                                               placeholder="Color"
                                               value={color}
                                               readOnly/>
                                        <button
                                            className={'bg-blue-500 w-48 text-white p-2'}
                                            onClick={copyColor(color)}
                                        >
                                            Copy
                                        </button>
                                    </div>
                                ))}
                            </div>

                            <p className={'mt-4'}>
                                The colors are sorted from the most dominant to the least dominant. The color palette
                                is generated from the image you selected. You can copy the color of the processed image
                                to the clipboard.
                            </p>
                        </div>
                    </div>
                </div>

                <div className="mt-6 lg:w-1/2 order-1 lg:order-2">
                    <h3 className={'text-lg font-bold text-black mb-4'}>
                        Preview of the image:
                    </h3>

                    <div className={'w-full md:w-[380px] xl:w-[470px] p-1 border-2 border-white-500'}>
                        <ImageColorPicker
                            onColorPick={handleColorPick}
                            imgSrc={selectedImage}
                            zoom={1}
                        />
                    </div>

                    <p className={'mt-4'}>
                        Click on the image to get the color of the pixel you clicked on.
                        The results are displayed in the left column of the page. You can copy the color of the
                        processed image to the clipboard.<br/><br/>
                        The color palette of the image is displayed below the color picker.
                        The colors are sorted from the most dominant to the least dominant.
                    </p>
                </div>
            </div>
        </div>
    );
};

export default App;