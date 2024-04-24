import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';

class Cofig{
  static MediaQueryData? mediaQueryData;
  static double? screenWidth;
  static double? screenHeight;

  void init(BuildContext context){
    mediaQueryData = MediaQuery.of(context);
    screenWidth = mediaQueryData!.size.width;
    screenHeight = mediaQueryData!.size.height;
  }

  static get widthSize{
    return screenWidth;
  }

  static get heightSize{
    return screenHeight;
  }

  static const spaceSmall = SizedBox(height: 25,);
  static final spaceMedium = SizedBox(height: screenHeight!*0.5);
  static final spaceBig = SizedBox(height: screenHeight!*0.8,);

  static const outlineBorder = OutlineInputBorder(
    borderRadius: BorderRadius.all(Radius.circular(8))
  );

  static const focusBorder = OutlineInputBorder(
    borderRadius: BorderRadius.all(Radius.circular(8)),
    borderSide: BorderSide(
      color: Colors.blueAccent
    )
  );

  static const errorBorder = OutlineInputBorder(
    borderRadius: BorderRadius.all(Radius.circular(8)),
    borderSide: BorderSide(
      color: Colors.red
    )
  );
}